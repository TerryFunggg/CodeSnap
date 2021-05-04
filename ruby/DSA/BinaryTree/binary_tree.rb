class Node
  attr_accessor :value, :left, :right

  def initialize(value)
      @value = value
  end

  def add_node(node)
      if node.value < value
          return self.left = node if left.nil?

          left.add_node node
      else
          return self.right = node if right.nil?

          right.add_node node
      end
  end

  def to_s
      "#{left} #{value} #{right}".strip
  end

  def to_post_order
      "#{value} #{left} #{right}".strip
  end
end

class Tree

  def initialize
      @root = nil
  end

  def add(value)
      node = Node.new(value)
      return @root = node if @root.nil?
      
      @root.add_node node
  end

  def to_s
      @root.to_s
  end
end