class Node
  attr_accessor :value, :parent_node, :next_node

  def initialize(value, parent_node: nil, next_node: nil)
    @value = value
    @parent_node = parent_node
    @next_node = next_node
  end

  def add_child(value)
    if @next_node.nil?
      node = Node.new(value, parent_node: self)
      self.next_node = node
    else
      # if next node is not null, keep find it
      @next_node.add_child value
    end
  end

  def add_to_head(value)
    node = Node.new(value, next_node: self)
    self.parent_node = node
    node
  end

  def remove_child
    return self.next_node = nil if @next_node.next_node.nil?

    @next_node.remove_child
  end

  def remove_head
    @next_node.parent_node = nil

    @next_node
  end

  def to_s
    "#{value} #{next_node}".strip
  end
end

class LinkedList
  def initialize
    @root = nil
  end

  # add to tail
  def add(value)
    return @root = Node.new(value) if @root.nil?

    @root.add_child value
  end

  def add_to_head(value)
    return @root = Node.new(value) if @root.nil?

    @root = @root.add_to_head value
  end

  def remove
    raise 'No node in list' if @root.nil?
    return @root = nil if @root.next_node.nil?

    @root.remove_child
  end

  def remove_head
    raise 'No node in list' if @root.nil?
    return @root = nil if @root.next_node.nil?

    @root = @root.remove_head
  end

  def to_s
    @root.to_s
  end
end
